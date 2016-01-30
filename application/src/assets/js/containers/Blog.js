import React from 'react';

let styles = {
	main:{
		width:'100%',
		display:'inline-block'
	}
};

class Blog extends React.Component {
  render(){
    return  <section id='blogPage' style={styles.main}>
				{this.props.children}
            </section>;
  }
}

export default Blog;