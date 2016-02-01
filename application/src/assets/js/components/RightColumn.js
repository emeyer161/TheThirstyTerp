import React from 'react';
import Radium from 'radium';

// import Hero from '../components/Hero';

let styles = {
	box:{
		width:'100%',
		height:'300px',
		marginTop:'10px',
		boxSizing:'border-box',
		padding:'10px',
		border:'1px solid #e8e8e8',
		borderRadius: '5px',
		overflow:'scroll'
	}
};

class RightColumn extends React.Component {
	componentDidMount() {
		if (!typeof twttr === 'undefined'){
			twttr.widgets.load();
		}
	}
	
	render(){
	    return  <div id='rightColumn' style={[styles.main, this.props.style]} >
    				<a className="twitter-timeline" href="https://twitter.com/TheThirstyTerp" data-widget-id="685961120058859520" width="330" height="400">Tweets by @TheThirstyTerp</a>
	            	<div style={styles.box}>
	            		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus magna urna, venenatis a sem nec, faucibus varius purus. Curabitur consectetur congue libero eget malesuada. Duis ac porta orci. Quisque eget elit varius, semper orci non, sagittis lacus. Fusce aliquam massa non est iaculis sodales. Donec a suscipit felis. Praesent rhoncus volutpat lorem, ut feugiat dui pulvinar nec. Aenean vulputate mauris eget orci ultrices tempus. Mauris pellentesque ligula at dolor tempus, ac dapibus elit interdum. Aliquam sagittis imperdiet libero ac egestas. Integer at mauris tempus, feugiat erat dapibus, dapibus purus. Aliquam scelerisque, augue non bibendum posuere, massa felis luctus massa, eget varius elit velit id justo. Donec cursus aliquet lorem, nec facilisis erat pulvinar nec. Nunc orci diam, posuere blandit neque nec, maximus vestibulum elit. Duis molestie libero ac diam aliquet pulvinar. Sed tortor eros, vestibulum eu nunc et, tristique imperdiet metus. Phasellus nunc dolor, porttitor quis lorem id, tincidunt rhoncus nibh. Donec mattis neque a nulla mattis, sit amet egestas tellus fermentum. Etiam libero nisl, posuere quis sollicitudin at, malesuada sed dui. Sed vel tempor dolor. Cras auctor volutpat sagittis. Aliquam vitae finibus ligula. Quisque dapibus vehicula laoreet. In iaculis placerat dui et euismod.
	            	</div>
	            </div>;
	}
}

export default Radium(RightColumn);