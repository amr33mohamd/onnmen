import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout";
import * as React from "react";
import CardMedia from "@mui/material/CardMedia";
import Box from "@mui/material/Box";

import { Link } from "@inertiajs/react";
import Stack from "@mui/material/Stack";
import { DataGrid } from "@mui/x-data-grid";
import moment from "moment";

const columns = [
    { field: "id", headerName: "ID", width: 70 },
    {
        field: "appointment_date",
        headerName: "date",
        width: 200,
        valueGetter: (params) =>
            moment(params.row.appointment_date).format("MMMM Do YYYY, h a"),
    },
    { field: "status", headerName: "status", width: 130 },
    {
        field: "patient",
        headerName: "Patient Name",
        width: 130,
        valueGetter: (params) => params.row?.patient?.name,
    },
    {
        field: "reason",
        headerName: "reason",
    },
];

const Appointments = ({ auth, appointments }) => {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    {"Appointments"}
                </h2>
            }
        >
            <Head title={"Appointments"} />
            <Box
                sx={{
                    width: "95%",
                    backgroundColor: "white",
                    padding: 5,
                    margin: "auto",
                    marginY: 3,
                }}
            >
                <DataGrid
                    rows={appointments}
                    columns={columns}
                    initialState={{
                        pagination: {
                            paginationModel: { page: 0, pageSize: 5 },
                        },
                    }}
                    pageSizeOptions={[5, 10]}
                />
            </Box>
        </AuthenticatedLayout>
    );
};
export default Appointments;
