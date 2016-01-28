import React from 'react';
// import Radium from 'radium';

var styles = {
    main:{
        width:'80%',
        marginLeft:'10%',
        padding:'10px',
        backgroundColor: '#bc0f0b',
        borderRadius:'10px',
        color:'white'
    },
    input: {
        height:'24px',
        width:'50%',
        border:'1px solid black',
        borderRadius:'12px',
        textAlign:'center',
        backgroundColor:'white',
        fontSize:'13px',
        fontWeight:'600'
    },
    inputBody:{
        width: '96%',
        height: '400px',
        padding: '2%',
        border:'1px solid black',
        borderRadius: '10px',
        fontSize:'12px'
    }
};

class Upload extends React.Component {
  render(){
    return  <section id='Upload' style={styles.main}>
			    <form action="http://thethirstyterp.com/posts" method="POST">
            		<h3>Title:</h3>
            	        <input type="text" name='title' style={styles.input} />
            	    <h3>Body:</h3>
            	        <textarea type="text" name='body' style={styles.inputBody} />
            	    <h3>Image Filename:</h3>
            	        <input type="text" name='img_filename' style={styles.input} />
            	    <h3>User ID:</h3>
            	        <input type="text" name='user_id' style={styles.input} />
            	        
                    <br/><br/>
            	    <button type="submit" value="Submit" style={styles.input} >Submit</button>
            	</form>
            </section>;
  }
}

export default Upload;