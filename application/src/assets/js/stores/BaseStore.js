import dispatcher from '../dispatcher';
import Events from 'events';
// import { CHANGE } from '../constants';

class BaseStore extends Events.EventEmitter {
    
    constructor() {
        super();
        
        if(!this.register){
            console.error("It is required to define a register function when extending BaseStore.");
            return;
        }
        
		dispatcher.register(this.register.bind(this));
		
		this.storeDidMount && this.storeDidMount();
    }
    
    addListenerNow(cb){
        this.on("change", cb);
    }
    
    removeListenerNow(cb){
        this.removeListener("change", cb);
    }
    
    emitChange(){
        this.emit("change");
    }
    
}

export default BaseStore;