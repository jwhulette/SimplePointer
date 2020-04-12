import axios from 'axios';

export default class {

    constructor(routes) {
        this.routes = JSON.parse(routes);
      }

      /**
       * Join a player to a room
       */
      async join(name, type, roomId) {
        let data = {
            name: name,
            type: type,
            roomid: roomId
        };

        try {
              const response = await axios
                  .put(this.routes.player_join, data);
              return response.data;
          }
          catch (error) {
              console.log(error.message);
            //   return error;
          }
      }


      /**
       * Join a player to a room
       */
      async getPlayers(roomid) {
          data = {
              roomid: roomid
          }
        try {
              const response = await axios
                  .put(this.routes.player_list, data);
              return response.data;
          }
          catch (error) {
              console.log(error.message);
            //   return error;
          }
      }

 }
