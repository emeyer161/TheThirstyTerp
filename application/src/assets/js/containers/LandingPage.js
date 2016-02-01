import React from 'react';

import RightColumn from '../components/RightColumn';
import StubList from './StubList';
import DecoratedCarousel from '../components/Carousel/DecoratedCarousel';

// import Hero from '../components/Hero';

let styles = {
	body: {
		display: 'inline-block',
		width: '100%',
		float:'left'
	},
	welcome:{
		margin:'0 0 20px 0'
	},
	carousel:{
		height:'300px',
		width:'100%',
		margin:'0 0 15px 0'
	}
};

class LandingPage extends React.Component {
	constructor(){
		super();
		
		this.state = {
          slides: [
                { id: 0, title: '', description: '', src: 'http://lorempixel.com/800/400/sports/' },
                { id: 1, title: '', description: '', src: 'http://lorempixel.com/800/300/sports/' },
                { id: 2, title: '', description: '', src: 'http://lorempixel.com/700/400/sports/' },
                { id: 3, title: '', description: '', src: 'http://lorempixel.com/700/300/sports/' },
            ]
        };
	}
	render(){
	    return  <section id='landingPage' style={styles.body}>
		    		<h1 id="welcome" style={styles.welcome}>Welcome! Schu, the latin is mostly all gone</h1>
		    		<DecoratedCarousel slides={this.state.slides} show={1} delay={4} buttons={false} style={styles.carousel}/>
		    		<StubList />
	            </section>;
	}
}

export default LandingPage;

// <a class="twitter-timeline" href="https://twitter.com/Yodude0101" data-widget-id="685743903438467074">Tweets by @Yodude0101</a>
// <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
