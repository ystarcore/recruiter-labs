import React from "react";
import { useSelector } from "react-redux";
import { Card, Typography } from "antd";

import JobContainer from "./home.job";
import HomeGoogle from "./home.google";

const { Paragraph } = Typography;

const Dashboard = () => {
    const userData = useSelector((apps) => apps.app.user);

    if (userData.role_type == 2)
        return (
            <div className="dash">
                <JobContainer />
                <HomeGoogle />
            </div>
        );

    return (
        <Card title="Dashboard" bordered={false}>
            <Typography>
                <Paragraph>No data</Paragraph>
            </Typography>
        </Card>
    );
};

export default Dashboard;
