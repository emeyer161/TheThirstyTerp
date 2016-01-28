import React from 'react';

let styles = {
	videoContent: {
		width: '80%',
		float: 'left'
	}
}

class Videos extends React.Component {
  render(){
    return  <section id='videoContent' style={styles.videoConent}>
    			Here be videos
            </section>;
  };
}

export default Videos;