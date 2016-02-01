import React from 'react';
import $ from 'jquery';
// import Radium from 'radium';
import FullArticle from '../components/FullArticle';
import PostStore from '../stores/PostStore';

var styles = {
    main:{
    
    }
};

class PostContainer extends React.Component {
    constructor(){
        super();
        
        this.state = {
            post: {}
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
        this._getPost(nextProps.params.postId);
    }
    
    _getPost(id){
        this.setState({
            post: PostStore.getPostById( id ? id : this.props.params.postId )
        });
    }
  
    render(){
        return  <section id='postContainer' style={styles.main}>
    		        <FullArticle post={this.state.post} />
                </section>;
    }
}

export default PostContainer;