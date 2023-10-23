import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout";
import * as React from "react";
import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import CardMedia from "@mui/material/CardMedia";
import Typography from "@mui/material/Typography";
import { Button, CardActionArea, CardActions,Alert } from "@mui/material";
import Grid from "@mui/material/Unstable_Grid2";
import Box from "@mui/material/Box";
import Pagination from '@mui/material/Pagination';
import PaginationItem from '@mui/material/PaginationItem';
import { Link } from '@inertiajs/react'
import Stack from '@mui/material/Stack';


const Index = ({ auth,doctors }) => {
    
    return (
       
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
            }
        >
        
            <Head title="Dashboard" />

            <Box
                sx={{
                    width: "95%",
                    backgroundColor: "white",
                    padding: 5,
                    margin: "auto",
                    marginY: 3,
                }}
                
            >
             <Grid container rowSpacing={2} columnSpacing={3}>
                {doctors.data.map((doctor) => (
                    <Grid lg={3} md={4} xs={6}>
                        <Card>
                            <CardActionArea>
                                <CardMedia
                                    component="img"
                                    height="140" 
                                    image="https://t4.ftcdn.net/jpg/02/60/04/09/360_F_260040900_oO6YW1sHTnKxby4GcjCvtypUCWjnQRg5.jpg"
                                    alt="green iguana"
                                />
                                <CardContent>
                                    <Typography
                                        gutterBottom
                                        variant="h5"
                                        component="div"
                                    >
                                        {doctor.name}
                                    </Typography>
                                    <Typography
                                        variant="body2"
                                        color="text.secondary"
                                    >
                                        {doctor.email}
                                    </Typography>
                                </CardContent>
                            </CardActionArea>
                            <CardActions>
                                <Link href={"/reserve/"+doctor.id} style={{ color:"blue" }}>
                                    Book Appointment
                                </Link>
                            </CardActions>
                        </Card>
                    </Grid>
                    ))}
                </Grid>
                <Stack alignItems="center" >

                <Pagination
      page={doctors.current_page}
      style={{padding:'20px'}}
      count={doctors.last_page}
      renderItem={(item) => (
        <PaginationItem
          component={Link}
          href={`/dashboard${item.page === 1 ? '' : `?page=${item.page}`}`}
          {...item}
        />
      )}
    />
    </Stack>

            </Box>
         
        </AuthenticatedLayout>
    );
};
export default Index;
