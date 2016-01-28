import React from 'react';

var styles = {
	main: {
		position:'relative',
		float: 'right',
        margin: '9px 20px',
        height:'24px',
        width:'200px',
        border:'1px solid #E4E4E4',
        borderRadius:'12px',
        textAlign:'center',
        display:'inline'
	}
}

class SearchBar extends React.Component {
	constructor(props) {
	    super(props);
	    
	    this.state = {
	        value: ''
	    }
	}

	render() {
	    return  <input id='searchBar' type="text" 
	                    value={this.state.value}
	                    placeholder={this.props.placeholder}
	                    style={styles.main}
	                    onChange={this._handleChange.bind(this)} 
	                    onKeyDown={this._handleKeyDown.bind(this)}/>
	}

	_handleChange(event) {
	    this.setState({
	        value: event.target.value
	    })
	}

	_handleKeyDown(event) {
	    if (event.which === 13) {
	        this.props.onSubmit(this.state.value);
	        this.setState({
	            value: ''
	        })
	    }
	}
}

SearchBar.propTypes = {
    placeholder: React.PropTypes.string,
    onSubmit: React.PropTypes.func
}

SearchBar.defaultProps = {
    placeholder: 'Default Placeholder',
    onSubmit: function(){}
}

export default SearchBar;