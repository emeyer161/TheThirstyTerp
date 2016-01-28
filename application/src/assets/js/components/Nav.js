import React from 'react';
import Radium from 'radium';
import Router from 'react-router';
var Linker = Router.Link

import SearchBar from '../components/SearchBar';

let styles = {
	main: {
		position: 'relative',
		top: '28px',
		width: 'inherit',
		height: '50px',
		backgroundColor: '#bc0f0b',
		borderBottomLeftRadius: '5px',
		borderBottomRightRadius: '5px'
	},
	sticky: {
		position:'fixed',
		top:'0',
		margin:'0px 0 0'
	},
	navList: {
		position: 'relative',
		listStyle: 'none',
		display: ']table',
		float: 'left',
		display: 'inline-block',
	    width: '600px',
	    height: 'inherit',
	    margin: '0 0 0 15px',
	    padding: '0',
	    lineHeight: '100%'
	},
	navItem: {
		display: 'inline-block',
		width: '100px',
		padding: '14px 10px',
		textAlign: 'center'
	},
	navItemLink: {
		fontSize: '22px',
		color: 'white',
		textDecoration: 'none',
		':hover': {
			textShadow: '0px 0px 5px black',
			fontWeight: '900'
		}
	},
	navSubList: {
		position:'relative',
		left: '-8px',
		display: 'none', //display: table;
	    backgroundColor: '#bc0f0b',
	    opacity: '.9',
	    margin: '12px 0 0 0',
	    padding: '0',
	    borderBottomLeftRadius: '5px',
		borderBottomRightRadius: '5px'
	},
	navSubItem: {
		display: 'inline-block',
		float: 'bottom',
		width: '100px',
		padding: '14px 10px',
		textAlign: 'center'
	},
	show: {
		display: 'table'
	}
};

class Nav extends React.Component {
	constructor(props){
		super(props);
		this.state = {
			isSticky: false,
			hover:0
		}
	}

	_handleSubmit(value) {
		alert('You searched for: ' + value);
    }

    _mouseOver(value){
    	this.setState({
    		hover: value
    	});
    }

	render(){
		return  <div id='nav' style={[styles.main, this.state.isSticky && styles.sticky]}>
					<ul style={styles.navList}>
						
						<li style={styles.navItem}><a href='/#' key='1' style={styles.navItemLink}> Home </a></li>

						<li style={styles.navItem} onMouseOver={function(){this._mouseOver(2)}.bind(this)} onMouseLeave={function(){this._mouseOver(0)}.bind(this)}>
							<a href='/#/blog' key='2' style={styles.navItemLink}> Blog </a>
							<ul style={[styles.navSubList, (this.state.hover==2) && styles.show]}>
								<li style={styles.navSubItem}><a href='' key='21' style={styles.navItemLink}>Latest</a></li>
								<li style={styles.navSubItem}><a href='' key='22' style={styles.navItemLink}>Most Viewed</a></li>
								<li style={styles.navSubItem}><a href='' key='23' style={styles.navItemLink}>Archive</a></li>
							</ul>
						</li>

						<li style={styles.navItem} onMouseOver={function(){this._mouseOver(3)}.bind(this)} onMouseLeave={function(){this._mouseOver(0)}.bind(this)}>
							<a href='' key='3' style={styles.navItemLink}> Vidcasts </a>
							<ul style={[styles.navSubList, (this.state.hover==3) && styles.show]}>
								<li style={styles.navSubItem}><a href='' key='31' style={styles.navItemLink}>Norwich Family Podcast</a></li>
								<li style={styles.navSubItem}><a href='' key='32' style={styles.navItemLink}>NFL Pick Em</a></li>
							</ul>
						</li>

						<li style={styles.navItem}><a href='' key='4' style={styles.navItemLink}> CoolThing </a></li>
					</ul>
					<SearchBar placeholder={'Search the Site'} onSubmit={this._handleSubmit.bind(this)} />
				</div>;
	};

	componentDidMount() {
		var stop  		= document.getElementById("nav").offsetTop - 0,
			docBody   	= document.documentElement || document.body.parentNode || document.body,
			hasOffset 	= window.pageYOffset !== undefined,
			scrollTop;

		window.onscroll = function (e) {
			scrollTop = hasOffset ? window.pageYOffset : docBody.scrollTop; // cross-browser compatible scrollTop.
			// if user scrolls to 0px - at the top of the left div
			if (scrollTop >= stop) {	// stick the div
				this.setState({
					isSticky: true
				});
			} else {	// release the div
				this.setState({
					isSticky: false
				});
			}
		}.bind(this)
	}
}

export default Radium(Nav);