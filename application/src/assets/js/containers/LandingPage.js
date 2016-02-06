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
                { id: 0, title: '', description: '', src: 'http://lorempixel.com/800/400/' },
                { id: 1, title: '', description: '', src: 'http://lorempixel.com/800/300/' },
                { id: 2, title: '', description: '', src: 'http://lorempixel.com/700/400/' },
                { id: 3, title: '', description: '', src: 'http://lorempixel.com/700/300/' },
            ]
        };
	}
	render(){
	    return  <section id='landingPage' style={styles.body}>
		    		<h1 id="welcome" style={styles.welcome}>Welcome! Authors, the latin is mostly all gone.</h1>
		    		<DecoratedCarousel slides={this.state.slides} show={1} delay={4} buttons={false} style={styles.carousel}/>
		    		<StubList category='all' />
	            </section>;
	}
}

export default LandingPage;