import axios from 'axios';

export default class {

    constructor(routes) {
        this.routes = JSON.parse(routes);
    }

      /**
       * Join a player to a room
       */
      async join(name, type, roomId, userid) {
        let data = {
            name: name,
            type: type,
            roomid: roomId,
            userid: userid
        };

        try {
              const response = await axios
                  .put(this.routes.join, data);
              return response.data;
          }
          catch (error) {
              console.log(error.message);
              return error;
          }
      }

      /**
       * Record a players vote
       */
      async vote(roomid, userid, vote) {
          let params = {
              roomid: roomid,
              userid: userid,
              vote: vote
          }
        try {
              const response = await axios
                  .put(this.routes.vote, params);
              return response.data;
          }
          catch (error) {
                return error;
          }
      }

            /**
       * Record a players vote
       */
      async show(roomid) {
        let params = {
            roomid: roomid,
        }
      try {
            const response = await axios
                .put(this.routes.show, params);
            return response.data;
        }
        catch (error) {
              return error;
        }
      }

      /**
       * Record a players vote
       */
      async clear(roomid) {
        let params = {
            roomid: roomid,
        }
      try {
            const response = await axios
                .put(this.routes.clear, params);
            return response.data;
        }
        catch (error) {
              return error;
        }
    }

 }
