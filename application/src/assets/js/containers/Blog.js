import React from 'react';
// import Hero from '../components/Hero';

let styles = {
	main:{
		width:'100%',
		display:'inline-block'
	},
	blogContent: {
		width: '70%',
		padding:'0 15px 0 0',
		boxSizing:'border-box',
		float: 'left'
	},
	blogSidebar:{
		width:'30%',
		height:'600px',
		float:'right',
		backgroundColor:'black'
	}
};

class Blog extends React.Component {
  render(){
    return  <section id='blogPage' style={styles.main}>
				<div id='blogContent' style={styles.blogContent}>
					{this.props.children}
				</div>
				<div id='blogSidebar' style={styles.blogSidebar}>
				
				</div>
            </section>;
  }
}

export default Blog;