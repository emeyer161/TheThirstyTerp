import React from 'react';
import Radium from 'radium';

var styles = {
	main: {
		display: 'inline-block',
		width: 'inherit',
		height: '50px',
		bottom: '0px',
		backgroundColor: 'black',
		color: 'white'
	}
}

class Footer extends React.Component {
  render(){
    return  <section id='footer' style={styles.main}>
    			This is our stuff. Dont take it. <br />
    			© Copyright 2016, The Thirsty Terp, New York, NY. [Terms of Use | Privacy Policy]
            </section>;
  };
}

export default Footer;