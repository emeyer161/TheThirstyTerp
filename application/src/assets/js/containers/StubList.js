import React from 'react';
// import Radium from 'radium';
import StubArticle from '../components/StubArticle';
import { getNextPage } from '../actions/PostActions';
import PostStore from '../stores/PostStore';
import LoadNextButton from '../components/LoadNextButton';

var styles = {
	main:{
	    width:'100%'
	},
	noMore:{
	    position:'relative',
	    margin:'20px auto',
	    textAlign:'center',
	    fontSize:'25px',
	    color:'gray',
	    fontWeight:'600'
	}
};

class StubList extends React.Component {
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
           _posts:  PostStore.getPosts(this.props.category)
        });
    }
    
    _handleLoadMore(){
        getNextPage();
    }
    
    render(){
        return  <section id='stubList' style={styles.main}>
        			{this.state._posts.map((post, index) => {
                        return <StubArticle values={post} key={index}/>;
                    })}
                    {PostStore.lastPage() ? <div style={styles.noMore}>No more posts available</div> :
                        <LoadNextButton onClick={this._handleLoadMore.bind(this)} />
                    }
                </section>;
    }
}

export default StubList;