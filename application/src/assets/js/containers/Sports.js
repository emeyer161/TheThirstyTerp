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

class Sports extends React.Component {
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
	    return  <section id='sports' style={styles.body}>
		    		<DecoratedCarousel slides={this.state.slides} show={1} delay={4} buttons={false} style={styles.carousel}/>
		    		<StubList category='sports' />
	            </section>;
	}
}

export default Sports;