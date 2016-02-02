import React from 'react';
import Radium from 'radium';

let styles = {
  main:{
    display: 'inline-block',
    backgroundColor:'white',
    textAlign:'center',
    fontSize:'30px',
    color:'black',
    border:'none',
    borderRadius:'100%',
    ':hover':{
      boxShadow:'0px 0px 3px 3px white'
    }
  }
};

class PrevButton extends React.Component {
  render(){
    var propStyles = this.props.style || {};
    return  <button key='prevButton' style={[styles.main,propStyles]} id='prevButton' onClick={this._handleClick.bind(this)}> {'<'} </button>;
  };
  
  _handleClick(){
    this.props.onClick();
  }
}

export default Radium(PrevButton);