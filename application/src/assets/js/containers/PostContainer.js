import React from 'react';
import $ from 'jquery';

import FullArticle from '../components/FullArticle';
import PostBuilder from '../components/PostBuilder';
import PostStore from '../stores/PostStore';

var styles = {
    main:{
    
    },
    editButton:{
        display:'block',
        width:'100px',
        height:'50px',
        float:'right',
        backgroundColor:'red',
        color:'white',
        border:'none',
        borderRadius:'50px'
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
        $.ajax({
            type: "PUT",
            url: "/posts/"+values.id,
            data: values,
            success: function() {
                alert('Your post has been updated!');
                this._toggleEditMode();
            }.bind(this),
            error: function() {
                alert("Apparently Failed but honestly probably don't believe it. I bet it worked");
                this._toggleEditMode();
            }.bind(this)
        });
    }
    
    _toggleEditMode(){
        this.setState({
            editMode: !this.state.editMode
        });
    }
  
    render(){
        return  <section id='postContainer' style={styles.main}>
                    <button onClick={this._toggleEditMode.bind(this)} style={styles.editButton}>Edit</button>
                    {this.state.editMode
                    ?   <PostBuilder post={this.state.post} onSubmit={this._updatePost.bind(this)} />
                    :   <FullArticle post={this.state.post} />}
                </section>;
    }
}

export default PostContainer;