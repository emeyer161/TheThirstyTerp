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
    constructor(props){
        super(props);
        
        this.state={
            values:this.props.post
        };
    }
  
    _onEditorChange(value) {
        this._onTextChange(value, 'body');
    }
    
    _onTextChange(value, id){
        var newValues = this.state.values;
        newValues[id] = value;
        
        this.setState({
            values: newValues
        });
    }
    
    _submit(){
        var newValues = this.state.values;
        console.log('submitting: ',newValues);
        this.props.onSubmit(newValues);
    }
    
    render(){
        return  <form id='postBuilder' style={styles.main}>
            		<h3>Title:</h3>
            		    <TextBar id='title' value={this.state.values.title} onChange={this._onTextChange.bind(this)} style={styles.textBar} />
            	    <h3>Body:</h3>
            	        <ReactQuill theme="snow" style={styles.editor}
            	            defaultValue={this.props.post.body}
            	            value={this.state.values.body}
                            onChange={this._onEditorChange.bind(this)} />
            	    <h3>Image Filename:</h3>
            	        <TextBar id='img_filename' value={this.state.values.img_filename} onChange={this._onTextChange.bind(this)} style={styles.textBar} />
            	    <h3>User ID:</h3>
            	        <TextBar id='user_id' value={this.state.values.user_id} onChange={this._onTextChange.bind(this)} style={styles.textBar} />
                    <br/><br/>
            	    <button onClick={this._submit.bind(this)} style={styles.textBar}>Submit</button>
                </form>;
    }
}

export default PostBuilder;