<template>
    <div>
        <hot-table
            :colHeaders="columnHeaders"
            :settings="hotSettings"
            :class="className"
            :afterChange="onAfterChange"
        >
            <hot-column title="ID" read-only="true"></hot-column>
            <hot-column title="Name"></hot-column>
            <hot-column title="Username"></hot-column>
            <hot-column title="Email"></hot-column>
            <hot-column title="Email Verified At" read-only="true"></hot-column>
            <hot-column title="password" read-only="true"></hot-column>
            <hot-column title="Image"></hot-column>
            <hot-column title="Phone"></hot-column>
            <hot-column title="Birthday"></hot-column>
            <hot-column title="Deleted At" read-only="true"></hot-column>
            <hot-column title="Remember Token" read-only="true"></hot-column>
            <hot-column title="Created At" read-only="true"></hot-column>
            <hot-column title="Updated At" read-only="true"></hot-column>
            
        </hot-table>
    </div>
</template>

<script>
import "handsontable/dist/handsontable.full.min.css";
import { defineComponent } from "vue";
import { HotTable, HotColumn } from "@handsontable/vue3";
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
                minSpareRows: 14,
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
                    50, 100, 120, 120, 150, 150, 100, 100, 120, 100, 120, 150,
                    120, 120,
                ],
            },
            columns: [
                "id",
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
        async onAfterChange(changes) {
            let user = {
                0: "",
                1: "",
                2: "",
                3: "",
                4: "",
                5: "",
                7: "",
                8: "",
                9: "",
                10: "",
                11: "",
                12: "",
                13: "",
            };
            let current_row;

            for (const [row, prop, oldValue, newValue] of changes) {
                current_row = row;
                if (this.hotSettings.data[row]) {
                    this.hotSettings.data[row][prop] = newValue;
                    user = this.hotSettings.data[row];
                } else {
                    user[row][prop] = newValue;
                }
            }
            let data = {};

            const columns = this.columns;
            user.map(function (item, index) {
                data[columns[index]] = item;
            });

            if (data.name == null) {
                data.name = "newname";
            }

            if (data.username == null) {
                data.username = this.generateRandom();
            }

            if (data.email == null) {
                data.email = this.generateRandom() + "@gmail.com";
            }

            if (data.password == null) {
                data.password = "123456789";
            }

            axios.post(`api/v1/updateOrCreate`, data).then((response) => {
                if (response.status === 200) {
                    this.hotSettings.data[current_row][0] =
                        response.data.user.id;
                }
            });
        },

        generateRandom() {
            const length = 8;
            const characters =
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            let result = "";
            for (let i = 0; i < length; i++) {
                result += characters.charAt(
                    Math.floor(Math.random() * characters.length)
                );
            }
            return result;
        },
    },
});
</script>

<style>
.excel-like-table {
    border: 1px solid #bcb7b7;
    border-collapse: collapse;
    width: 100%;
}

.excel-like-table th {
    background-color: #cdc8c8;
    border: 1px solid #b2adad;
    padding: 8px;
    text-align: center;
    color: black;
    font-weight: bold;
}

.excel-like-table td {
    border: 1px solid #b2adad;
    padding: 8px;
    text-align: center;
    color: rgb(0, 0, 0);
    font-weight: bold;
}

.htCenter {
    text-align: center;
}

.htMiddle {
    vertical-align: middle;
}
</style>
