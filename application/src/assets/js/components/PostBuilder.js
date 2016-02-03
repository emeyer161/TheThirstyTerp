import React from 'react';
import ReactQuill from 'react-quill';
import TextBar from './TextBar';

import $ from 'jquery';

var styles = {
    main:{
        boxSizing:'border-box',
        width:'100%',
        padding:'10px',
        backgroundColor: '#bc0f0b',
        borderRadius:'10px',
        color:'white'
    },
    textBar: {
        height:'24px',
        width:'50%',
        border:'1px solid black',
        borderRadius:'12px',
        textAlign:'center',
        backgroundColor:'white',
        fontSize:'13px',
        fontWeight:'600'
    },
    editor:{
        border:'1px solid black',
        borderRadius:'12px',
        backgroundColor:'white',
        color:'black',
        height:'400px',
        paddingBottom:'40px'
    }
};

class PostBuilder extends React.Component {
    constructor(){
        super();
        
        this.state={
            values:{
                // editor:'',
                // title:'',
                // imgFilename:'',
                // userId:''
            },
        };
    }
  
    _onEditorChange(value) {
        this._onTextChange(value, 'editor');
    }
    
    _onTextChange(value, id){
        var newValues = this.state.values;
        newValues[id] = value;
        
        this.setState({
            values: newValues
        });
    }
    
    _clicked(){
        var formData = new FormData();

        formData.append("title", this.state.values.title);
        formData.append("body", this.state.values.editor);
        formData.append("img_filename", this.state.values.imgFilename);
        formData.append("user_id", this.state.values.userId);
        
        
        var request = new XMLHttpRequest();
        request.open("POST", "https://thethirstyterp-emeyer161.c9users.io/posts");
        request.send(formData);
    }
  
    render(){
        return  <form id='postBuilder' style={styles.main}>
            		<h3>Title:</h3>
            		    <TextBar id='title' onChange={this._onTextChange.bind(this)} style={styles.textBar} />
            	    <h3>Body:</h3>
            	        <ReactQuill theme="snow" style={styles.editor}
            	            value={this.state.values.editor}
                            onChange={this._onEditorChange.bind(this)} />
            	    <h3>Image Filename:</h3>
            	        <TextBar id='imgFilename' onChange={this._onTextChange.bind(this)} style={styles.textBar} />
            	    <h3>User ID:</h3>
            	        <TextBar id='userId' onChange={this._onTextChange.bind(this)} style={styles.textBar} />
                    <br/><br/>
            	    <button onClick={this._clicked.bind(this)} style={styles.textBar}>Submit</button>
                </form>;
    }
}

export default PostBuilder;