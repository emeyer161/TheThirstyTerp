import React from 'react';
import $ from 'jquery';

import FullArticle from '../components/FullArticle';
import PostBuilder from '../components/PostBuilder';
import PostStore from '../stores/PostStore';

var styles = {
    main:{
    
    },
    editButton:{
        display:'flex',
        width:'125px',
        height:'32px',
        marginTop:'8px',
        float:'right',
        background:'none',
        border:'none',
        borderRadius:'50px'
    },
    editImage:{
        display:'inline-block',
        height:'inherit',
        marginRight:'5px'
    },
    editText:{
        fontFamily:'sans-serif',
        fontSize:'28px',
        textAlign:'center'
    }
};

class PostContainer extends React.Component {
    constructor(){
        super();
        
        this.state = {
            post: {},
            editMode: false,
            authenticated: true
        };
    
        this._getPost = this._getPost.bind(this);
    }
    
    componentDidMount() {
        PostStore.addListenerNow(this._getPost);
        this._getPost();
    }
    
    componentWillUnmount() {
        PostStore.removeListenerNow(this._getPost);
    }
    
    componentWillReceiveProps(nextProps){ 
        this._getPost(nextProps.params.postSlug);
    }
    
    _getPost(slug){
        this.setState({
            post: PostStore.getPostBySlug( slug ? slug : this.props.params.postSlug )
        });
    }
    
    _updatePost(values){
        var response = $.ajax({
            type: "PUT",
            url: "/posts/"+values.id,
            data: values,
            dataType: 'text',
            success: function(result) {
                this._toggleEditMode();
                return result;
            }.bind(this),
            error: function(result) {
                this._toggleEditMode();
                return result;
            }.bind(this)
        });
        
        alert(response);
    }
    
    _toggleEditMode(){
        this.setState({
            editMode: !this.state.editMode
        });
    }
  
    render(){
        console.log(this.state.post);
        return  <section id='postContainer' style={styles.main}>
                    <button onClick={this._toggleEditMode.bind(this)} style={styles.editButton}>
                        <img src='./img/edit.png' style={styles.editImage} />
                        <span style={styles.editText}>{this.state.editMode ? "Show" : "Edit"}</span>
                    </button>
                    {this.state.editMode
                    ?   <PostBuilder initialValues={this.state.post} onSubmit={this._updatePost.bind(this)} />
                    :   <FullArticle values={this.state.post} />}
                </section>;
    }
}

export default PostContainer;