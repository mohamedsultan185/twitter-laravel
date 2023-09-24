<template>
    <div>
        <hot-table
            :data="users"
            :colHeaders="columnHeaders"
            :settings="hotSettings"
            :id="id"
            :class="className"
            ref="hotTable"
        ></hot-table>

        <!-- New User button -->
        <button @click="addNewUser" class="btn btn-primary">New User</button>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { HotTable } from "@handsontable/vue3";
import { registerAllModules } from "handsontable/registry";
import "handsontable/dist/handsontable.full.css";
import axios from "axios";

registerAllModules();

export default defineComponent({
    props: {
        users: Array,
    },
    data() {
        const columnHeaders = [
            "ID",
            "Name",
            "Username",
            "Email",
            "Email Verified At",
            "Image",
            "Phone",
            "Birthday",
            "Deleted At",
            "Created At",
            "Updated At",
            "Remember Token",
        ];

        const hotSettings = {
            colWidths: [
                50, 100, 120, 150, 150, 100, 100, 120, 100, 120, 150, 120, 120,
            ],
            rowHeights: 30,
            stretchH: "all",
            className: "htCenter htMiddle",
            licenseKey: "non-commercial-and-evaluation",
            contextMenu: ["remove_row"],
            afterChange: this.handleAfterChange,
        };

        return {
            columnHeaders,
            hotSettings,
            id: "my-custom-id",
            className: "my-custom-classname excel-like-table",
        };
    },
    components: {
        HotTable,
    },
    methods: {
        async handleAfterChange(changes) {
            if (changes === null) {
                console.error("No changes detected.");
                return;
            }
            for (const [row, prop, oldValue, newValue] of changes) {
                console.log(this.users[row]);
                try {
                    const userId = this.users[row].ID; // Use "ID" property for user ID
                    const response = await axios.put(
                        `api/v1/users/${userId}/update`,
                        {
                            name: this.users[row].Name,
                            username: this.users[row].Username,
                            email: this.users[row].Email,
                            email_verified_at:
                                this.users[row]["Email Verified At"],
                            image: this.users[row].Image,
                            phone: this.users[row].Phone,
                            birthday: this.users[row].Birthday,
                        }
                    );
                } catch (error) {
                    console.error("Error:", error.message);
                }
            }
        },

        async addNewUser() {
            const newUser = {
                Name: "name",
                Username: "username",
                Email: "email",
                "Email Verified At": null,
                Image: "image",
                Phone: "phone",
                Birthday: "",
                "Deleted At": null,
                "Created At": null,
                "Updated At": null,
                "Remember Token": "",
            };

            console.log(newUser);

            this.users.push(newUser);

            this.scrollToLastRow();
            try {
                const response = await axios.post(
                    "api/v1/users/store",
                    newUser
                );

                console.log("User inserted successfully:", response.data);
            } catch (error) {
                console.error("Error inserting user:", error.message);
            }
        },

        generateUniqueId() {
            return Date.now();
        },

        scrollToLastRow() {
            const hotInstance = this.$refs.hotTable.hotInstance;
            const lastRowIndex = this.users.length - 1;

            if (hotInstance) {
                hotInstance.scrollViewportTo(lastRowIndex, 0);
            }
        },
    },
});
</script>

<style>
.excel-like-table {
    border: 1px solid #ddd;
    border-collapse: collapse;
    width: 100%;
}

.excel-like-table th {
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    color: black;
    font-weight: bold;
}

.excel-like-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    color: rgb(60, 134, 90);
}

.htCenter {
    text-align: center;
}

.htMiddle {
    vertical-align: middle;
}
</style>
