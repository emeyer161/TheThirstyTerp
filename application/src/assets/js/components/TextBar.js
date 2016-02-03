import React from 'react';
import Radium from 'radium';

var styles = {
	main: {
		position:'relative',
        height:'24px',
        width:'200px',
        border:'1px solid #E4E4E4',
        borderRadius:'12px',
        textAlign:'center',
        display:'inline'
	}
};

class TextBar extends React.Component {
	constructor(props) {
	    super(props);
	    
	    this.state = {
	        value: ''
	    };
	}

	render() {
	    return  <input id={this.props.id} type="text" 
	                    value={this.props.value || this.state.value}
	                    placeholder={this.props.placeholder}
	                    style={[styles.main, this.props.style]}
	                    onChange={this._handleChange.bind(this)} />;
	}

	_handleChange(event) {
	    this.setState({
	        value: event.target.value
	    });
	    this.props.onChange(event.target.value, this.props.id);
	}
}

TextBar.propTypes = {
    placeholder: React.PropTypes.string,
    onChange: React.PropTypes.func
};

TextBar.defaultProps = {
    placeholder: 'Default Placeholder',
    onChange: function(){},
    style: null
};

export default Radium(TextBar);