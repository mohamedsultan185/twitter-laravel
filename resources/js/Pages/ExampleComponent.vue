<template>
  <div>
    <div style="margin: 1ex;">Calculations: {{ calculations }}</div>
    <table class="table" border="0">
      <tr class="row">
        <td id="empty_first_cell"></td>
        <td class="column" v-for="(_, j) in cols" :key="'header' + j">
          {{ letters[j] }}
        </td>
      </tr>

      <tr class="row" v-for="(user, i) in users" :key="i">
        <td class="column">{{ i + 1 }}</td>
        <td class="column" v-for="(__, j) in cols" :key="i + '-' + j"
            :class="{ column_selected: active(i, j), column_inactive: !active(i, j),  }"
            @click="activate(i, j)"
        >
          <div v-if="active(i, j)">
            <input :ref="'input' + i + '-' + j"
                   v-model="user[fields[j]]"
                   @keydown.enter.prevent="ui_enter()"
                   @keydown.esc="ui_esc()"
            />
          </div>
          <div v-else>
            {{ user[fields[j]] }}
          </div>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
import { ref, reactive, computed, watchEffect, toRefs, nextTick, onUpdated } from "vue";

export default {
  name: 'App',
  components: {},
  data() {
    return {
      ui_editing_i: null,
      ui_editing_j: null,
      users: [
        {
          name: "John Doe",
          email: "john@example.com",
          username: "johndoe",
        },
        // Add more user objects as needed
      ],
      fields: ["name", "email", "username"], // Define the order of fields
    }
  },
  // ...
};
</script>
