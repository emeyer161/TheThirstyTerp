import React from 'react';
import Radium from 'radium';
import Carousel2 from './Carousel2';
import NextButton from './NextButton';
import PrevButton from './PrevButton';

class DecoratedCarousel extends Carousel2 {
    constructor(props){
        super(props);
        
        this.newStyles = {
            main:{
                width: props.style.width || "100%",
                height: props.style.height || "100%",
                margin: props.style.margin || "0"
            },
            prevButton:{
                width:'5%',
                verticalAlign:'top',
                marginTop:'120px'
            },
            nextButton:{
                width:'5%',
                verticalAlign:'top',
                marginTop:'120px'
            },
            slideshow:{
                display:'inline-block',
                width:'90%',
                height:'100%'
            },
            pagination:{
                position:'relative',
                width:'100%',
                height:'8%',
                top:'-40px',
                textAlign:'center',
                lineHeight:'100%',
            },
            pageDot:{
                display:'inline-block',
                margin:'10px',
                fontSize: '60px',
                color:'white',
                textShadow:'0px 0px 3px black'
            }
        };
        
        for (var attrname in this.newStyles) { this.styles[attrname] = this.newStyles[attrname]; }
    }
    
    // _getDescription(){
    //     return this.props.slides[this.refs.Carousel.getCurrentSlide()].description;
    // }
    
    render(){
        this.styles.viewport.width="100%";
        this.styles.viewport.height="100%";
        this.styles.viewport.display="inline-block";
        
        if (this.props.buttons){
            this.styles.viewport.width="90%";
        }
        
        // var dotArray = [];
        // for (var i=0; i<Math.ceil(this.props.slides.length/this.props.show); i++) {
        //     dotArray[i] = i*this.props.show;
        // }
        
        return  <div style={this.styles.main} id='decoratedCarousel'>
                    {this.props.buttons ? <PrevButton onClick={this.prevSlide.bind(this)} style={this.styles.prevButton} /> : null}
                        {super.render()}
                    {this.props.buttons ? <NextButton onClick={this.nextSlide.bind(this)} style={this.styles.nextButton} /> : null}
                    
                    <div style={this.styles.pagination} id="pagination">
                    {this.slides.map(function(slideReference,i){
                        return <p key={i} onClick={function(){this.goTo(i)}.bind(this)} 
                                style={i==this.state.currentSlide   ? [this.styles.pageDot,{color:'red'}]   : this.styles.pageDot}>
                                    &middot;
                                </p>;
                    }.bind(this))}
                    </div>
                </div>;
    }
    
}

export default Radium(DecoratedCarousel);