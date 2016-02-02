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
        this._getPost(nextProps.params.postSlug);
    }
    
    _getPost(slug){
        this.setState({
            post: PostStore.getPostBySlug( slug ? slug : this.props.params.postSlug )
        });
    }
  
    render(){
        return  <section id='postContainer' style={styles.main}>
    		        <FullArticle post={this.state.post} />
                </section>;
    }
}

export default PostContainer;