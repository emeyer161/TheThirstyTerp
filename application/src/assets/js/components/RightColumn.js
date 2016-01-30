import React from 'react';
import Radium from 'radium';

// import Hero from '../components/Hero';

let styles = {
	
}

class RightColumn extends React.Component {
	componentDidMount() {
		if (twttr){
			twttr.widgets.load();
		}
	};
	render(){
	    return  <div id='rightColumn' style={[styles.main, this.props.style]} >
    				<a className="twitter-timeline" href="https://twitter.com/TheThirstyTerp" data-widget-id="685961120058859520" width="330" height="400">Tweets by @TheThirstyTerp</a>
	            </div>;
	};
}

export default Radium(RightColumn);