import React from 'react';
// import Radium from 'radium';
import StubArticle from '../components/StubArticle';
import { getNextPage } from '../actions/PostActions';
import PostStore from '../stores/PostStore';
import LoadNextButton from '../components/LoadNextButton';

var styles = {
	main:{
	    
	}
};

class BlogLanding extends React.Component {
    constructor(){
        super();
        
        this.state = {
            _posts: []
        };
        
        this._updateAll = this._updateAll.bind(this);
    }
    
    componentDidMount() {
        PostStore.addListenerNow(this._updateAll);
        this._updateAll();
    }
    
    componentWillUnmount() {
        PostStore.removeListenerNow(this._updateAll);
    }
    
    _updateAll(){
        this.setState({
           _posts:  PostStore.getAll()
        });
    }
    
    _handleLoadMore(){
        getNextPage();
    }
    
    render(){
        return  <section id='BlogLanding' style={styles.main}>
        			{this.state._posts.map((post, index) => {
                        return <StubArticle post={post} key={index}/>;
                    })}
                    {PostStore.lastPage() ? null :
                        <LoadNextButton onClick={this._handleLoadMore.bind(this)} />
                    }
                </section>;
    }
}

export default BlogLanding;