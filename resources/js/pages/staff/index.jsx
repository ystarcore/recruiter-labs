import React from "react";
import {
    Card,
    Row,
    Col,
    Table,
    Button,
    Switch,
    Avatar,
    Typography,
    Space,
    message,
} from "antd";
import { useNavigate } from "react-router-dom";
import { EyeOutlined, FileOutlined, FileAddOutlined } from "@ant-design/icons";
import { Calendar, momentLocalizer } from "react-big-calendar"; // or fullcalendar-react
import { format, parse, startOfWeek, getDay } from "date-fns";
import "react-big-calendar/lib/css/react-big-calendar.css"; // for react-big-calendar
import moment from "moment";

import { useSelector } from "react-redux";
import { useFetchStaffQuery, useFetchFullEventsQuery } from "./staff.service";
const localizer = momentLocalizer(moment);
const { Title } = Typography;

const MyStaffPage = ({}) => {
    const navigate = useNavigate();
    const { data: staffData, isLoading } = useFetchStaffQuery();
    const { data: calendarData } = useFetchFullEventsQuery();
    console.log(staffData);

    const handleSwitchChange = (checked) => {
        message.info(
            `Calendar view is now ${checked ? "enabled" : "disabled"}`
        );
    };

    const columns = [
        {
            title: "#",
            dataIndex: "index",
            render: (_, record, index) => index + 1,
        },
        {
            title: "Profile Picture",
            dataIndex: "emp_picture",
            style: { textAlign: "center" },
            render: (emp_picture) => (
                <Avatar
                    src={
                        emp_picture
                            ? `https://www.recstack.co/public/${emp_picture}`
                            : "public/assets/images/default_user.jpg"
                    }
                    size={36}
                    shape="circle"
                />
            ),
        },
        {
            title: "Name",
            dataIndex: "name",
            style: { textAlign: "center" },
            render: (name) => <Typography.Text>{name}</Typography.Text>,
        },
        {
            title: "Email",
            dataIndex: "email",
            style: { textAlign: "center" },
        },
        {
            title: "Job Title",
            dataIndex: "job_title",
            style: { textAlign: "center" },
            render: (title) => <Typography.Text>{title}</Typography.Text>,
        },
        {
            title: "Action",
            dataIndex: "action",
            render: (text, record) => (
                <Button
                    type="primary"
                    style={{ width: "50%" }}
                    icon={<EyeOutlined />}
                    size="large"
                    onClick={() => navigate(`/employee/${record.id}`)}
                />
            ),
        },
    ];

    // Transform employee data for the table

    if (isLoading) return <>Loading</>;
    return (
        <div className="content">
            <Card
                style={{ marginTop: "20px", height: "600px" }}
                title="Upcoming Events"
                extra={
                    <Row
                        justify="end"
                        align=""
                        style={{ marginBottom: "10px" }}
                    >
                        <Col>
                            <Button
                                type="primary"
                                href="/events"
                                icon={<FileAddOutlined />}
                            >
                                Create Event
                            </Button>
                        </Col>
                    </Row>
                }
            >
                <Calendar
                    localizer={localizer}
                    events={calendarData}
                    startAccessor="start"
                    endAccessor="end"
                    views={["month", "agenda"]}
                    defaultView="month" // Set the default view to "week"
                    style={{ height: "400px" }}
                    toolbar={true}
                />
            </Card>

            {/* Staff List Table */}
            <Card style={{ marginTop: "20px" }} title="My Staff List">
                <Table
                    columns={columns}
                    dataSource={staffData.employees.map((employee) => ({
                        key: employee.id,
                        name: employee.name,
                        email: employee.email,
                        job_title: employee.employee_details?.title || "N/A",
                        emp_picture: employee.employee_details?.emp_picture,
                        id: employee.id,
                    }))}
                    pagination={false}
                    rowKey="key"
                />
            </Card>

            {/* HR Documents Table */}
            <Card style={{ marginTop: "20px" }} title="General Documents">
                <Table
                    columns={[
                        {
                            title: "#",
                            dataIndex: "index",
                            render: (_, record, index) => index + 1,
                        },
                        {
                            title: "Image",
                            dataIndex: "image",
                            render: (image) => (
                                <Avatar
                                    src={
                                        image
                                            ? `public/${image}`
                                            : "public/assets/images/default_user.jpg"
                                    }
                                    size={36}
                                    shape="circle"
                                />
                            ),
                        },
                        {
                            title: "Title",
                            dataIndex: "title",
                            render: (title) => (
                                <Typography.Text>{title}</Typography.Text>
                            ),
                        },
                        {
                            title: "View",
                            dataIndex: "view",
                            render: (text, record) => (
                                <Button
                                    type="link"
                                    icon={<EyeOutlined />}
                                    size="small"
                                    href={`public/${record.file}`}
                                    target="_blank"
                                >
                                    View
                                </Button>
                            ),
                        },
                    ]}
                    dataSource={staffData?.data?.user_hr_documents || []}
                    pagination={false}
                    rowKey="id"
                />
            </Card>
        </div>
    );
};

export default MyStaffPage;
