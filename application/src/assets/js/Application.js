import React from 'react';
import ReactDOM from 'react-dom';
import { Router, Route, Link, History, IndexRoute } from 'react-router';

import Header from './components/Header';
import Footer from './components/Footer';
import LandingPage from './containers/LandingPage';
import RightColumn from './components/RightColumn';

import News from './containers/News';
import Sports from './containers/Sports';
import Videos from './containers/Videos';
import About from './containers/About';
import Blog from './containers/Blog';

import PostBuilder from './components/PostBuilder';
import PostContainer from './containers/PostContainer';

var styles = {
    main: {
        width:'1100px',
        margin: 'auto',
        backgroundColor: 'white'
    },
    allContent: {
        width: '68%',
        margin: '20px 0',
        display: 'inline-block',
        float:'left',
        minHeight: window.innerHeight-240,
    },
    column: {
		display: 'inline-block',
		width: '30%',
		float: 'right',
		margin: '20px 0'
    }
};

class Application extends React.Component {
  	render(){
	    return  <div id='application' style={styles.main}>
                    <Header />
                    <section id='allContent' style={styles.allContent}>
                        {this.props.children}
                    </section>
                    <RightColumn style={styles.column} />
                    <Footer />
	            </div>;
  	}
}
  
ReactDOM.render((
  <Router>
        <Route path="/" component={Application}>
            <IndexRoute component={LandingPage}/>
            <Route path="videos" component={Videos}/>
            <Route path="sports" component={Sports}/>
            <Route path="news" component={News}/>
            <Route path="about" component={About}/>
            
            <Route path="posts" component={Blog}>
                <Route path="upload" component={PostBuilder}/>
                <Route path=":postSlug" component={PostContainer}/>
            </Route>
            
        </Route>
  </Router>
), document.getElementById('app'));