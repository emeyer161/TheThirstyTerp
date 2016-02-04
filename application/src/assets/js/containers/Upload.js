import React from 'react';
import PostBuilder from '../components/PostBuilder';

import $ from 'jquery';

let styles = {
	main: {
	    
	}
};

class Upload extends React.Component {
    _uploadValues(values){
        $.ajax({
             type: "POST",
             url: "/posts/",
             data: values,
             success: function (result) {
                    alert('Success');
             },
             error: function () {
                    alert('Failed');
             }
        });
    }
    
    render(){
        return  <section id='upload' style={styles.main}>
                    <PostBuilder cb={this._uploadValues.bind(this)} />
                </section>;
    }
}

export default Upload;