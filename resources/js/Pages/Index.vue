<template>
    <div>
        <hot-table
            :data="users"
            :colHeaders="columnHeaders"
            :settings="hotSettings"
            :id="id"
            :class="className"
        ></hot-table>
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
        const readOnlyUsers = this.users.map((user) => {
            return {
                ...user,
                "Deleted At": user["Deleted At"],
                "Created At": user["Created At"],
                "Updated At": user["Updated At"],
            };
        });
        return {
            userData: [],
            columnHeaders: [
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
            ],
            hotSettings: {
                colWidths: [
                    50, 100, 120, 150, 150, 100, 100, 120, 100, 120, 150, 120,
                    120,
                ],
                rowHeights: 30,
                stretchH: "all",
                className: "htCenter htMiddle",
                licenseKey: "non-commercial-and-evaluation",
                contextMenu: ["remove_row"],
                afterChange: this.handleAfterChange,
            },

            id: "my-custom-id",
            className: "my-custom-classname excel-like-table",
        };
    },
    components: {
        HotTable,
    },
    watch: {},
    methods: {
        async handleAfterChange(changes) {
            if (changes === null) {
                console.error("No changes detected.");
                return;
            }

            for (const [row, prop, oldValue, newValue] of changes) {
                console.log(this.users[row]);
                try {
                    const userId = this.users[row].id;
                    const response = await axios.put(
                        `api/v1/users/${userId}/update`,
                        {
                            name: this.users[row].name,
                            username: this.users[row].username,
                            email: this.users[row].email,
                            email_verified_at:
                                this.users[row].email_verified_at,
                            image: this.users[row].image,
                            phone: this.users[row].phone,
                            birthday: this.users[row].birthday,
                        }
                    );
                } catch (error) {
                    console.error("Error:", error.message);
                }
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
