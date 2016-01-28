import React from 'react';
import ReactDOM from 'react-dom';
import { Router, Route, Link, History, IndexRoute } from 'react-router';

import Header from './components/Header';
import Footer from './components/Footer';
import LandingPage from './containers/LandingPage';
import Blog from './containers/Blog';
import Videos from './containers/Videos';

import BlogLanding from './containers/BlogLanding';
import PostContainer from './containers/PostContainer';
import Upload from './components/Upload';

var styles = {
    main: {
        width:'1100px',
        margin: 'auto',
        backgroundColor: 'white'
    },
    allContent: {
        width: '100%',
        margin: '10px 0',
        display: 'inline-block',
        minHeight: window.innerHeight-240,
    }
};

class Application extends React.Component {
  	render(){
	    return  <div id='application' style={styles.main}>
                    <Header />
                        <section id='allContent' style={styles.allContent}>
                            {this.props.children}
                        </section>
                    <Footer />
	            </div>;
  	}
}
  
ReactDOM.render((
  <Router>
        <Route path="/" component={Application}>
            <IndexRoute component={LandingPage}/>
            <Route path="blog" component={Blog}>
                <IndexRoute component={BlogLanding}/>
                <Route path="markssecretpostlink" component={Upload}/>
                <Route path=":postId" component={PostContainer}/>
            </Route>
            <Route path="videos" component={Videos}/>
        </Route>
  </Router>
), document.getElementById('app'));