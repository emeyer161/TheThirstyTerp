import React from 'react';

import RightColumn from '../components/RightColumn';
import StubList from './StubList';

// import Hero from '../components/Hero';

let styles = {
	body: {
		display: 'inline-block',
		width: '98%',
		float:'left'
	},
	welcome:{
		margin:'0 0 20px 0'
	}
};

class LandingPage extends React.Component {
	render(){
	    return  <section id='landingPage' style={styles.body}>
		    		<h1 id="welcome" style={styles.welcome}>Welcome, Schu, the latin is gone</h1>
		    		<p> This section could be replaced by a nice welcome section from MacDaddy </p>
		    		<StubList />
	            </section>;
	}
}

export default LandingPage;

// <a class="twitter-timeline" href="https://twitter.com/Yodude0101" data-widget-id="685743903438467074">Tweets by @Yodude0101</a>
// <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
