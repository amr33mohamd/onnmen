import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout";
import * as React from "react";
import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import CardMedia from "@mui/material/CardMedia";
import Typography from "@mui/material/Typography";
import { Button, CardActionArea, CardActions } from "@mui/material";
import Grid from "@mui/material/Unstable_Grid2";
import Box from "@mui/material/Box";
import Pagination from "@mui/material/Pagination";
import PaginationItem from "@mui/material/PaginationItem";
import { LocalizationProvider } from "@mui/x-date-pickers/LocalizationProvider";
import { DateTimePicker } from "@mui/x-date-pickers/DateTimePicker";
import { AdapterDayjs } from "@mui/x-date-pickers/AdapterDayjs";
import { FormControl, Input, FormHelperText, InputLabel } from "@mui/material";
import SendIcon from "@mui/icons-material/Send";
import { useState } from 'react'
import { router } from '@inertiajs/react'
import { useForm } from '@inertiajs/react'


const Index = ({ auth, doctor, appointments,errors }) => {
   
    const [values, setValues] = useState({
        appointment_date: "",
        reason: "",
        doctor_id: doctor.id
      })
    
      function handleChange(e) {
        //check if e.target exists
        if (!e.target) {
          setValues(values => ({
            ...values,
            appointment_date: e,
          }))
          return
        }
        else{
            const key = e.target.id;
            const value = e.target.value
            setValues(values => ({
                ...values,
                [key]: value,
            }))
        }
      }

    function handleSubmit(e) {
        e.preventDefault()
        router.post('/reserve', values)
      }
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    {"Reservation with doctor " + doctor.name}
                </h2>
            }
        >
            <Head title={doctor.name} />
            <Box
                sx={{
                    width: "95%",
                    backgroundColor: "white",
                    padding: 5,
                    margin: "auto",
                    marginY: 3,
                }}
            >
                <Box
                    sx={{
                        width: "80%",
                        margin: "auto",
                        flexDirection: "column",
                    }}
                >
                    {/* <h1>{appointments}</h1> */}
                    <form onSubmit={handleSubmit}>
                    <FormControl sx={{ width: "100%", marginY: 1 }}>
                        <InputLabel htmlFor="my-input">
                            Reason of meeting
                        </InputLabel>
                        <Input
                            id="reason"
                            aria-describedby="my-helper-text"
                            value={values.reason}
                             onChange={handleChange}
                        />
                        <FormHelperText id="my-helper-text">
                            please enter the reason of meeting
                        </FormHelperText>
                        <p style={{ color:"red" }}>{errors.reason && <div>{errors.reason}</div>}</p>

                    </FormControl>

                    <FormControl sx={{ width: "100%" }}>
                        <LocalizationProvider dateAdapter={AdapterDayjs}>
                            <DateTimePicker
                                timeSteps={{ hours: 1, minutes: 60 }}
                                shouldDisableTime={(time) => {
                                    if (
                                        time.toISOString() ==
                                        "2023-10-22T10:00:00.000Z"
                                    ) {
                                        return true;
                                    }
                                    return false;
                                }}
                                label="Time"
                                id="appointment_date"
                                value={values.appointment_date}
                                 onChange={handleChange}
                            />
                            <FormHelperText id="my-helper-text">
                                gray times are reserved or not a working time of
                                doctor
                            </FormHelperText>
                            <p style={{ color:"red" }}>{errors.appointment_date && <div>{errors.appointment_date}</div>}</p>

                        </LocalizationProvider>
                    </FormControl>
                    <Button type="submit" variant="contained" endIcon={<SendIcon />}>
                        Book
                    </Button>
                    </form>
                </Box>
            </Box>
        </AuthenticatedLayout>
    );
};
export default Index;
