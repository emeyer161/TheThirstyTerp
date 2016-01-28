import React from 'react';
// import Radium from 'radium';

var styles = {
    main:{
        height:'100px',
        width:'100%',
        padding:'15px 0',
        borderBottom: '2px dotted gray'
    },
    imgContainer:{
        height:'100%',
        width:'30%',
        display:'inline-block',
        float:'left',
        overflow:'hidden',
        
    },
    img:{
        width:'100%',
        display:'inline-block',
        verticalAlign:'middle'
    },
    textContainer:{
        height:'100%',
        width:'65%',
        display:'inline-block',
        float:'right',
        overflow:'hidden',
    },
    title:{
        width:'100%',
        display:'block',
        fontSize:'30px',
        color:'black',
        margin:'0 0 10px 0'
    },
    meta:{
        width:'100%',
        display:'block',
        fontSize:'20px',
        margin:'6px 0',
        color:'gray'
    }
};

class StubArticle extends React.Component {
    render(){
        return  <div className='StubArticle' style={styles.main}>
                    <a href={'/#/blog/'+this.props.post.ID}>
                        <div id="imgContainer" style={styles.imgContainer}>
                            <img src={'./img/contentImages/' + this.props.post.img_filename} style={styles.img}/>
                        </div>
                        <div id='textContainer' style={styles.textContainer}>
                            <h1 style={styles.title}>{this.props.post.title}</h1>
                            <h2 style={styles.meta}>{this.props.post.user_id}  |  {this.props.post.created_at}</h2>
                        </div>
                    </a>
                </div>;
    }
}

export default StubArticle;