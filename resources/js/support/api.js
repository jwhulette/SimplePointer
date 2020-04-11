import axios from 'axios';

export default class {

    constructor(routes) {
        this.routes = JSON.parse(routes);
      }

      /**
       * Join a player to a room
       */
      async join() {
        try {
              const response = await axios
                  .put(this.routes.player_join);
              return response.data;
          }
          catch (error) {
              console.log(error.message);
            //   return error;
          }
      }

 }
