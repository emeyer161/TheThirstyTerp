import dispatcher from '../dispatcher';
import $ from 'jquery';
import PostStore from '../stores/PostStore';

export function getBySlug(slug){
    var url = '/posts/' + slug;
    
    $.getJSON(url, function(result){
		dispatcher.dispatch({
			type: "posts.retrieved",
			posts: [result],
			nextPage: false,
			lastPage: false
		});
    });
}

export function getFirstPage(){
    var url = 'posts/?page=1';
    
    $.getJSON(url, function(result){
		dispatcher.dispatch({
			type: "posts.retrieved",
			posts: result.data,
			page: result.current_page,
			lastPage: result.last_page
		});
    });
}

export function getNextPage(){
	if(PostStore.lastPage()){
		dispatcher.dispatch({
				type: "posts.allRetrieved"
			});
	} else {
	    var pageNum = PostStore.getNextPageNum();
	    var url = 'posts/?page=' + pageNum;
	    
	    $.getJSON(url, function(result){
			dispatcher.dispatch({
				type: "posts.retrieved",
				posts: result.data,
				page: result.current_page,
				lastPage: result.last_page
			});
	    });
	}
}