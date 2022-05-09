<template>
  <div class="row">
    <div class="col-12 mb-2">
      <router-link :to="{ name: 'createNote' }" class="btn btn-success"
        ><i class="fas fa-plus-circle"></i
      ></router-link>
    </div>
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="bg-primary text-white">
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Content</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="note in notes" :key="note.id">
              <td>{{ note.id }}</td>
              <td>{{ note.title }}</td>
              <td>{{ note.content }}</td>
              <td>
                <router-link
                  :to="{ name: 'editNote', params: { id: note.id } }"
                  class="btn btn-info"
                  ><i class="fas fa-edit"></i
                ></router-link>
                <a
                  type="button"
                  @click="deleteNote(note.id)"
                  class="btn btn-danger"
                  ><i class="fas fa-trash"></i
                ></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "notes",
  data() {
    return {
      notes: [],
    };
  },
  mounted() {
    this.showNotes();
  },
  methods: {
    async showNotes() {
      await this.axios
        .get("/api/note")
        .then((response) => {
          this.notes = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.notes = [];
        });
    },
    deleteNote(id) {
      if (confirm("are you sure you want to delete?")) {
        this.axios
          .delete(`/api/note/${id}`)
          .then((response) => {
            this.showNotes();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
};
</script>