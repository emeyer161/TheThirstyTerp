import React from 'react';
import Radium from 'radium';

import Nav from '../components/Nav';

var styles = {
	main: {
		position:'relative',
		width:'inherit',
		height:'140px',
		marginBottom:'50px',
		backgroundImage: 'url(./img/emptyLogo.jpg)',
		backgroundSize: 'contain',
		backgroundPosition: 'left',
		backgroundRepeat: 'repeat-x',
		lineHeight: '140px'
	},
	logo: {
		position: 'relative',
	    display: 'block',
	    margin: 'auto',
	    height: '80%',
	    top: '10%'
	},
	title: {
		position: 'absolute',
		fontSize: '50px',
		margin: '0px 8px',
		top: '0px',
		color: '#bc0f0b'
	},
	sloganBox: {
		position: 'absolute',
		height: '100%',
		width: '370px',
		margin: '0px 20px',
		top: '0px',
		right: '0px',
		display:'flex',
		alignItems:'center'
	},
	sloganText: {
		lineHeight: '30px',
		textAlign: 'center',
		color: '#bc0f0b'
	}
};

class Header extends React.Component {
  render(){
    return  <section id='header' style={styles.main}>
    			<h1 style={styles.title}> Super Thirsty Terps </h1>
    			<img style={styles.logo} src='./img/mainLogo.png' />
    			<div style={styles.sloganBox}>
    				<h2 style={styles.sloganText}>Content is king. Let us pollute your minds.</h2>
    			</div>
    			<Nav />
            </section>;
  };
}

export default Header;