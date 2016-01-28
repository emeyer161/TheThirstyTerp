import React from 'react';
import Radium from 'radium';

let styles = { 
    main: {
        position:'relative',
        height:'40px',
        width:'110px',
        margin:'20px auto',
        borderRadius:'5px',
        border:'none',
        textAlign:'center',
        backgroundColor: '#bc0f0b',
        display:'block',
        color:'white',
        fontSize: '14px',
        fontWeight: '500'
    }
};

class LoadNextButton extends React.Component{
    constructor(props) {
        super(props);
    }
    
    render() {
        return  <input id='loadMoreButton' type="button" style={styles.main} onClick={this._handleClick.bind(this)} value="Load More" />;
    }
    
    _handleClick(event) {
        this.props.onClick();
    }
    
}

export default Radium(LoadNextButton);