<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header"><h4>Create Note</h4></div>
        <div class="card-body">
          <form @submit.prevent="create">
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
  name: "create_note",
  data() {
    return {
      note: {
        title: "",
        content: "",
      },
    };
  },
  methods: {
    async create() {
      await this.axios
        .post("/api/note", this.note)
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