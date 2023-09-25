import { defineComponent } from "vue";
import axios from "axios";

export default defineComponent({
components: {
HotTable,
HotColumn,
},
props: {
users: Object,
},
data() {
return {
hotSettings: {
data: this.users.map((item) => [
item.id,
item.name,
item.username,
item.email,
item.email_verified_at,
item.password,
item.image,
item.phone,
item.birthday,
item.deleted_at,
item.remember_token,
item.created_at,
item.updated_at,
]),
minSpareRows: 12,
height: "auto",
width: "auto",
manualRowMove: true,
stretchH: "all",
fillHandle: true,
autofill: {
autoInsertRow: true,
},
licenseKey: "non-commercial-and-evaluation",

colWidths: [
50, 100, 120, 150, 150, 100, 100, 120, 100, 120, 150, 120,
120,
],
},
columns: [
id, "",
"name",
"username",
"email",
"email_verified_at",
"password",
"image",
"phone",
"birthday",
"deleted_at",
"remember_token",
"created_at",
"updated_at",
"fcm_token",
],
id: "my-custom-id",
className: "my-custom-classname excel-like-table",
};
},

methods: {
onAfterChange(changes) {
let user = { ...this.defaultUser };
for (const [row, prop, oldValue, newValue] of changes) {
if (this.hotSettings.data[row]) {
this.hotSettings.data[row][prop] = newValue;
user = this.hotSettings.data[row];
} else {
user[prop] = newValue;
}
}
let data = {};
const columns = this.columns;
user.map(function (item, index) {
data[columns[index]] = item;
});
console.log(data);
axios
.post(`api/v1/updateOrCreate`, data)
.then((response) => {
if (response.status == 200) {
}
});
console.log(response);
},
},
});
