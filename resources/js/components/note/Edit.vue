<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header"><h4>Edit Note</h4></div>
        <div class="card-body">
          <form @submit.prevent="update">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label>Title</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="note.title"
                  />
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-floating">
                  <textarea
                    class="form-control"
                    id="textarea1"
                    v-model="note.content"
                    style="height: 100px"
                  ></textarea>
                  <label for="textarea1">Content</label>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "edit_note",
  data() {
    return {
      note: {
        title: "",
        content: "",
      },
    };
  },
  mounted() {
    this.showNote();
  },
  methods: {
    async showNote() {
      await this.axios
        .get(`/api/note/${this.$route.params.id}`)
        .then((response) => {
          const { title, content } = response.data;
          this.note.title = title;
          this.note.content = content;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async update() {
      await this.axios
        .put(`/api/note/${this.$route.params.id}`, this.note)
        .then((response) => {
          this.$router.push({ name: "showNotes" });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>