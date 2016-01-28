import React from 'react';

// import Hero from '../components/Hero';

let styles = {
	main: {
		display: 'inline-block',
		width: '30%',
		float: 'right',
		marginTop: '20px'
	}
}

class RightColumn extends React.Component {
	componentDidMount() {
		if (twttr){
			twttr.widgets.load();
		}
	};
	render(){
	    return  <div id='rightColumn' style={styles.main} >
    				<a className="twitter-timeline" href="https://twitter.com/TheThirstyTerp" data-widget-id="685961120058859520" width="330" height="400">Tweets by @TheThirstyTerp</a>
	            </div>;
	};
}

export default RightColumn;