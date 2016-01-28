import React from 'react';
import RightColumn from '../components/RightColumn'

// import Hero from '../components/Hero';

let styles = {
	body: {
		display: 'inline-block',
		width: '68%',
		float: 'left'
	}
}

class LandingPage extends React.Component {
	render(){
	    return  <section id='landingPage'>
	    			<div id='body' style={styles.body}>
		    			<h1>Welcome Brotha Man</h1>
		    			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at laoreet ex, in ullamcorper nibh. Fusce pellentesque a lorem ut sodales. Sed porta ante at nibh aliquet, vel accumsan arcu pulvinar. Praesent id ipsum lacinia, placerat elit quis, mollis mi. Nullam tempus non nunc vel luctus. Cras dolor augue, interdum et varius eu, luctus nec nunc. Vivamus nec dignissim sapien. In accumsan tempor efficitur.
						Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In consectetur leo et orci scelerisque varius. Donec non urna a tortor porta tristique et nec magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris non purus quam. Nullam id orci facilisis, pulvinar tellus eu, posuere tellus. Donec sit amet magna ut magna pulvinar laoreet eget tincidunt odio.
						Mauris mattis ligula eget magna posuere aliquet. Sed placerat sit amet enim eu congue. Nulla facilisi. Praesent sit amet dui viverra, pharetra mauris ac, posuere nulla. Vestibulum lectus lectus, rhoncus at ultrices eu, suscipit ac lorem. Aliquam aliquam convallis semper. Morbi elementum sapien non lacinia fermentum. Quisque justo velit, finibus eget arcu vitae, venenatis rhoncus ex. Nullam eleifend nibh sed tellus tincidunt finibus. Nam sed mi pretium sem pretium hendrerit. Nunc feugiat diam tempus dui viverra, ut vestibulum ante tincidunt. Maecenas aliquam dignissim ipsum, tincidunt tincidunt felis laoreet nec. Vestibulum tempor neque purus, sit amet malesuada velit commodo et.
						<h2> Here be a SubTitle </h2>
						In porttitor mi nec est laoreet sollicitudin. Aliquam erat volutpat. Duis mauris urna, gravida sit amet eros in, iaculis consectetur ipsum. Curabitur iaculis in ante a egestas. Integer a nulla at eros egestas hendrerit. Duis magna tellus, egestas at nisi eu, porta imperdiet libero. Duis porttitor, dolor aliquet molestie ultricies, sapien velit congue ipsum, ut congue ligula leo nec augue. Quisque et augue dui. Proin at velit vestibulum mauris varius vehicula. Aliquam lobortis tempor scelerisque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed mollis erat at dolor laoreet tempus. Etiam lacinia eros nisl, ut cursus ipsum gravida at. Nunc efficitur justo ornare rutrum finibus. Integer sem sapien, volutpat non efficitur ut, finibus in mi.
						Nulla facilisi. Aenean sollicitudin nulla vel massa lacinia interdum. Phasellus hendrerit nunc augue, blandit gravida orci tristique ut. Mauris vel tellus vel dui sagittis varius. Curabitur elementum erat vitae magna iaculis, mattis dapibus lorem dapibus. Praesent finibus dui mauris, ac dictum diam gravida quis. Praesent ex lectus, efficitur sollicitudin tincidunt non, eleifend sed velit.
						In nunc nibh, volutpat eu elit sit amet, ornare venenatis justo. In facilisis pellentesque dui quis suscipit. Nunc lacinia elit urna, at posuere libero vestibulum ac. Pellentesque odio nunc, molestie ac suscipit vitae, venenatis sit amet libero. Sed condimentum elit metus, at bibendum nisi sollicitudin non. Proin ac mauris mattis, tincidunt justo sed, consectetur velit. Pellentesque gravida scelerisque nibh ut eleifend.
						Vivamus vel euismod justo. Fusce fermentum commodo ligula pulvinar sagittis. Sed faucibus dui purus, a finibus tellus sagittis nec. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras quis pulvinar nisi, iaculis volutpat magna. Cras ac consequat lacus. Quisque ac faucibus nisl, a eleifend orci. Ut nunc tellus, hendrerit nec ante non, placerat convallis massa.
						Fusce sit amet scelerisque quam. Phasellus luctus risus ut ultrices consequat. Etiam tincidunt fermentum lobortis. Cras est massa, maximus id tortor eget, placerat iaculis massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vestibulum dictum eros quis commodo. Morbi in imperdiet ex. Nam euismod elit ac diam venenatis, eu malesuada dolor tincidunt.
						<h3> Here be a Smaller Differentiator </h3>
						Proin placerat nibh at ligula consequat, id euismod orci tincidunt. Donec a ultricies massa. In hac habitasse platea dictumst. Etiam sed fermentum lorem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque tristique placerat lorem. Ut non purus sollicitudin arcu aliquam finibus non ac sem. Mauris sodales nibh eu lacinia eleifend. Vestibulum lectus ex, congue nec lorem eu, facilisis suscipit dolor.
						Morbi nec blandit felis. Maecenas interdum tellus sed quam hendrerit elementum. Nam eleifend consequat mi, a euismod tortor interdum at. Donec ultricies id ante condimentum auctor. Vestibulum ut urna et justo malesuada efficitur. Suspendisse sagittis sagittis nibh id rutrum. Donec blandit pretium dui. Praesent sed lacinia quam. Praesent sit amet diam faucibus, blandit est a, facilisis diam. Sed laoreet justo eget lectus varius ultricies. Nunc viverra eros nec egestas tristique. Ut volutpat mattis tempor.
						Integer et metus aliquam, condimentum risus at, elementum ipsum. Mauris non sodales elit, ac imperdiet risus. Pellentesque vehicula, tortor in pulvinar convallis, nisl urna vulputate mi, nec rhoncus quam lectus ultrices nisi. Ut varius, mi eget varius sollicitudin, arcu sem ullamcorper est, at ultrices leo dui ut turpis. Fusce rutrum eros vel dolor iaculis rhoncus. Fusce molestie, justo eu elementum hendrerit, arcu dui vestibulum nunc, et aliquam nibh libero vel mauris. Duis et aliquet lacus. Praesent molestie egestas mi, vel placerat leo egestas eu. Proin interdum dui a hendrerit consequat. Cras commodo at diam ut blandit.
						Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris aliquam risus non laoreet finibus. Mauris suscipit nulla vulputate sem ultrices pellentesque. Aliquam et pellentesque nisi, non ullamcorper lectus. Morbi in pellentesque ex, eget sagittis ex. Suspendisse vel ex metus. Cras dapibus tellus dui, sed lobortis eros pellentesque nec. Duis ut mi pellentesque, rhoncus lectus tincidunt, condimentum justo. Nulla aliquam tempus sapien a mattis.
					</div>
		    		<RightColumn />
	            </section>;
	};
}

export default LandingPage;

// <a class="twitter-timeline" href="https://twitter.com/Yodude0101" data-widget-id="685743903438467074">Tweets by @Yodude0101</a>
// <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
