import React from "react";
import { useParams } from "react-router-dom";

import { useFetchJobQuery } from "./jobs.service";

import JobShowComponent from "../../components/JobShow";

export default function JobShow() {
    const { id } = useParams();

    const { data = { job: {} }, isFetching } = useFetchJobQuery(id);

    return <JobShowComponent job={data.job} loading={isFetching} />;
}
