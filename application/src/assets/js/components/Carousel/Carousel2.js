import React from 'react';
import Radium from 'radium';

class Carousel2 extends React.Component {
    constructor(props){
        super();
        this.state = {
            currentSlide:0
        };
        
        this.slides = props.slides || [];
        this.show = props.show || 0;
        
        this.styles = {
            viewport:{
                position: "relative",
                width: props.width || "100%",
                height: props.height || "100%",
                overflow: "hidden"
            },
            slideReel:{
                position: "relative",
                height: "100%",
                width:100/this.show*(this.slides.length+this.show-1)+'%',
                left:-(100/this.show*this.state.currentSlide)+'%',
                display:'flex'
            },
            slide:{
                height:'100%',
                width: 100/this.slides.length+'%',
                display:'inline-block'
            },
            img:{
                maxWidth:'100%',
                maxHeight:'100%',
                width:'100%',
                height:'100%',
                objectFit:'contain'
            }
        };
    }
    
    componentDidMount(){
        if (this.props.delay){
            this.incrementInterval = setInterval(function(){
                this.nextSlide();
            }.bind(this),this.props.delay*1000);
        }
    }
    
    componentWillUnmount(){
        if (this.incrementInterval){
            clearInterval(this.incrementInterval);
        }
    }
    
    nextSlide(){
        this.goTo(this.state.currentSlide+1);
    }
    
    prevSlide(){
        this.goTo(this.state.currentSlide-1);
    }
    
    goTo(id){
        if (id==-1){
            id = this.props.slides.length-1;
        } else{
            id = id%this.props.slides.length;
        }
        this.setState({
            currentSlide:id
        });
    }
    
    getCurrentSlide(){
        return this.state.currentSlide;
    }
    
    render(){
        var liveSlides = this.slides.concat(this.slides.slice(0,this.show-1));
        this.styles.slideReel.left = -(100/this.show*this.state.currentSlide)+'%';
        
        return  <div style={this.styles.viewport} id='viewport'>
                    <div style={this.styles.slideReel} id='slideReel' >
                        {liveSlides.map((slide, i) => {
                            return  <div key={i} style={this.styles.slide} id='slide' onClick={function(){this.goTo(i)}.bind(this)} >
                                        <img src={slide.src} style={this.styles.img} id='img' />
                                    </div>;
                        })}
                    </div>
                </div>;
    }
}

export default Radium(Carousel2);