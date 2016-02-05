import BaseStore from './BaseStore';
import { getBySlug } from '../actions/PostActions';
import { getFirstPage } from '../actions/PostActions';
import _ from 'lodash';

class PostStore extends BaseStore {

	constructor(){
	    super();
	    
		this._posts = [];
		this._nextPageNum = 1;
		this._lastPage = false;
	}
	
	register(action){
		switch(action.type){
			// case "post.uploaded":
			// 	// Insert the action to upload the post here
			// 	this._posts.push(action.post);
			// 	this.emitChange();
			// 	break;
			
			case "posts.retrieved":
				for(var i=0; i<action.posts.length; i++){
					if( !_.find( this._posts, function(p) { return p.id == action.posts[i].id; }) ){
						this._posts.push(action.posts[i]);	
					}
				}
				this._sortPosts();
				
				action.page && (this._nextPageNum = action.page+1);
				
				if (action.lastPage){
					if (this._nextPageNum > action.lastPage){
						this._lastPage = true;
					}
				}
				
				this.emitChange();
				break;
			
			default:
				break;
		}
	}
	
	storeDidMount(){
		getFirstPage();
	}

	getPosts(category){
		if(category == 'all'){
			return this._posts;
		} else{ 
			return _.filter(this._posts, function(post){ 
				return post.category == category; 
			});
		}
	}

	getPostBySlug(slug){
		var post = _.find(this._posts, function(p) { 
			return p.slug == slug; 
		});

		if(post){   // If post is stored
			return post;
		}
		else {      // If post isn't stored
			getBySlug(slug);
			return {};
		}
	}
	
	getNextPageNum(){
		return this._nextPageNum;
	}
	
	lastPage(){
		return this._lastPage;
	}
	
	_sortPosts(){
		this._posts = _.orderBy(this._posts, 'id', 'desc');
	}
	
	// _addPosts(){
	// 	// handle adding posts
	// }
	
}

export default new PostStore();