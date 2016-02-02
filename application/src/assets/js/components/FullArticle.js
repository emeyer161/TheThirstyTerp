import React from 'react';
// import Radium from 'radium';

var styles = {
    main:{
        
    },
    header:{
        borderBottom: '2px dotted gray'
    },
    title:{
        fontSize:'40px',
        margin:'0 0 10px 0'
    },
    imgContainer:{
        width:'100%',
        maxHeight:'350px',
        overflow:'hidden'
    },
    img:{
        width:'100%',
        display:'inline-block',
        verticalAlign:'middle'
    },
    meta:{
        fontSize:'20px',
        margin:'6px 0',
        color:'gray'
    },
    body:{
        lineHeight: '1.5',
        fontSize: '18px'
    }
};

class FullArticle extends React.Component {
    _createMarkup(string) { 
        return {__html: string}; 
    }
    
    render(){
        return  <section className='Article' style={styles.main}>
                    <header id='articleHeader' style={styles.header}>
                        <h1 style={styles.title}>{this.props.post.title}</h1>
                        <div id="imgContainer" style={styles.imgContainer}>
                            <img src={'./img/contentImages/' + this.props.post.img_filename} style={styles.img}/>
                        </div>
                        <h2 style={styles.meta}>{this.props.post.user_id}  |  {this.props.post.created_at}</h2>
                    </header>
                    <p id="articleBody" style={styles.body} dangerouslySetInnerHTML={this._createMarkup(this.props.post.body)} />
                </section>;
    }
}

export default FullArticle;

// ../../../dist/img/contentImages/